---
layout: post
title: "Flutter Deeplink Step3: Handling Incoming URL"
date: 2021-10-08
categories: blogs
author: Thea Choem
comments: true
cover: https://user-images.githubusercontent.com/29684683/135708693-75db1ce7-9691-4e6c-99e1-c579d2a812f4.jpeg
permalink: /blogs/deeplink-flutter-step3-handing-incoming-url/
main_tag: flutter-deeplink
tags:
- flutter-deeplink
---
{% include dot.md %}
Deep links are a type of link that sends users directly to an app instead of a website or a store. They are used to send users straight to specific in-app locations, saving users the time and energy locating a particular page themselves – significantly improving the user experience.

To continue, make sure you have complete setting up the IOS and Android first to open the app via scheme & associated domain first:

For example, if the custom scheme is _juniorise_ & host url is _juniorise.com_:
```html
<a href="juniorise://juniorise.com"> Open Application via sheme </a>
<a href="https://juniorise.com"> Open Application via https </a>
```

<a class="primary-button" href="/blogs/deeplink-flutter-step1-android/"> Checkout Step 1 </a> + <a class="primary-button" href="/blogs/deeplink-flutter-step2-ios/"> Checkout Step 2 </a>

Once you complete both of them, it mean that your application can be open via URL. In this final step, we will take that link and naviagate them to a specific screen.
## 1. Get Incoming URL
In this article, we use [uni_links](https://pub.dev/packages/uni_links) to get incoming link, so let's add them to the project.

Run this command to add it to the project:
```
flutter pub add uni_links
```


There is 2 APIs from [uni_links](https://pub.dev/packages/uni_links) to get the incoming such as `getInitialLink()` to get link when the application is closed & `linkStream` to get the link while opening the application.

In `main.dart`:
```dart
...
import 'package:uni_links/uni_links.dart';

void main() async {
  ...
  String? url = await _initialUrl();
  runApp(
    StreamBuilder<String?>(
      stream: linkStream,
      builder: (context, snapshot) {
        print("HERE IS URL: $url"):
        return App(url: snapshot.data ?? url);
      },
    ),
  );
}

Future<String?> _initialUrl() async {
  try {
    return await getInitialLink();
  } catch (e) {}
}
```
Print them to make sure the link is gotten.

## 2. Navigate to a specific screen with the URL
The common navigating ways in Flutter are:
```dart
// 1:
Navigator.of(context).push(MaterialPageRoute(builder: (context) {
  return ProductsScreen(queryParameters: {"keyword": "iphone", "category_id": "12"});
}));

// 2:
Navigator.of(context).pushNamed(
  "/products",
  arguments: {"keyword": "iphone", "category_id": "12"},
);
```

Anyways, this will be hard to handle with Deeplink. In this tutorial, we will navigate with this method instead:
```dart
/// url = "https://vtenh.com/products?keywords=iphone&category_id=12";
Navigator.of(context).pushNamed(url);
```

### a. Add the package
To do this, we need a package named: [flutter_deep_linking](https://pub.dev/packages/flutter_deep_linking)

Run this command to add it to the project:
```
flutter pub add flutter_deep_linking
```

### b. Set up the route
Create a variable called `router`. You can put it anywhere, eg. in a class, in app.dart, or top of the `MaterialApp()`.
```dart
Router router = Router(
  routes: [

    // products routes
    Route(
      matcher: Matcher.path("products"),
      materialBuilder: (m.BuildContext _, RouteResult result) {
        return ProductsScreen(
          queryParameters: result.uri.queryParameters
        );
      },
      routes: [
        Route(
          matcher: Matcher.path('{id}'),
          materialBuilder: (m.BuildContext _, RouteResult result) {
            String id = result['id']!;
            return ProductDetailScreen(id: id);
          },
        )
      ],
    ),

    // 404 route
    Route(
      matcher: Matcher.any(),
      materialBuilder: (m.BuildContext _, RouteResult result) => NotFoundScreen(),
    ),
  ],
);
```

In this `router`, there is 3 routes which are: `/products`, `/products/{slugs}`, and a 404 route. 

Support url are:
1. /products:

```
https://example.com/products
https://example.com/products?keyword=123
```

2. /products/{slugs}:

```
https://example.com/products/apple-11
https://example.com/products/apple-11?recommend-by=visal-123
```

3. Other will goes to 404 screens.

### c. Generating the route
In your `MaterialApp()`, call `router.onGenerateRoute()` to generate them:
```dart
Router router = Router(
  ...
);

return MaterialApp(
  ...
  onGenerateRoute: (setting) {
    return router.onGenerateRoute(setting);
  },
);
```

## 3. Load the url
Firstly, create a `load()` function, to load the url:
```dart
void load({String? url}) {
  if (url == null) return;
  WidgetsBinding.instance?.addPostFrameCallback((timeStamp) {
    Navigator.of(context).pushNamed(url);
  });
}
```

Then call load on top of `MaterialApp()`:
```dart
load(url);

return MaterialApp(
  ...
);
```

{% include dot.md %}

You may need to load the home screen first before push to another screen, to do so, you may need to check if homescreen is initialized. eg.
```dart
if(HomeScreen.of(context).isInitialized){
  load(url);
}

return MaterialApp(
  ...
);
```

And in Home screen, you just need to call the load on initState()
```
void initState(){
  super.initState()
  load(url);
}
```

Finally, we have implemented the deeplink to the Flutter Application, please let me know if you have any questions!

<!-- 
## Step 2: Setup on IOS
## Step 3: Hosting Verification File
## Step 4: ​Handling the incoming link in the app
-->