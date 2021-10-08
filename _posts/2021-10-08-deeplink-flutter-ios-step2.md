---
layout: post
title: "Flutter Deeplink Step2: IOS"
date: 2021-10-08
categories: blogs
author: Thea Choem
comments: true
cover: https://user-images.githubusercontent.com/29684683/135708693-75db1ce7-9691-4e6c-99e1-c579d2a812f4.jpeg
permalink: /blogs/deeplink-flutter-android-step2/
---
{% include dot.md %}
Deep links are a type of link that sends users directly to an app instead of a website or a store. They are used to send users straight to specific in-app locations, saving users the time and energy locating a particular page themselves – significantly improving the user experience.

There are 2 types of IOS Deeplink: _URL scheme_ & ​​_Universal Links_.<br>
**URL scheme** can have any custom scheme and do not require a host, nor a hosted file while **Universal Links** require a specified host, plus a hosted file - `apple-app-site-association`

For example, if the custom scheme is _juniorise_ & host url is _juniorise.com_:
```html
<!-- URL scheme -->
<a href="juniorise://juniorise.com"> Open Application </a>

<!-- Universal Links -->
<a href="https://juniorise.com"> Open Application </a>
```

## 1. URL scheme
It is easy to setup the URL scheme, we only need to set the scheme & associated domains.
### a. Set the scheme
In `info.plish`, add a key `LSApplicationQueriesSchemes` with your scheme values:

Example if scheme is juniorise, http, or https:
```
juniorise://www.juniorise.com
http://www.juniorise.com
https://www.juniorise.com
```

Add following:
```xml
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
<dict>
...
  <key>LSApplicationQueriesSchemes</key>
  <array>
    <string>juniorise</string>
    <string>https</string>
    <string>http</string>
    <string>YOUR_SCHEME</string>
  </array>
...
</dict>
</plist>
```
### b. Set associated domains
Edit or create a file `ios/Runner/Runner.entitlements` if you don't have one with following value:
```xml
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
<dict>
  <key>com.apple.developer.associated-domains</key>
  <array>
    <string>applinks:juniorise.com</string>
    <string>applinks:www.juniorise.com</string>
    <string>applinks:YOUR_DOMAIN</string>
  </array>
</dict>
</plist>
```

It has done for `URL scheme`, in your site or anywhere, just do this to open the app:
```html
<!-- URL scheme -->
<a href="juniorise://juniorise.com"> Open Application </a>

<!-- Fill your own -->
<a href="YOUR_SCHEME://YOUR_DOMAIN"> Open Application </a>
```

Or via terminal:
```
xcrun simctl openurl booted "juniorise://juniorise.com/portfolios?keywords=123"
```

## 2. Universal Links
If you have setup the `URL scheme`, only things that we need is to host the verification files to `apple-app-site-association`

### Host the Verification file IOS
Create a file name `apple-app-site-association` then host them to `www.example.com/.well-known/apple-app-site-association`. 
```json
{
  "applinks": {
    "apps": [],
    "details": [
      {
        "appID": "Q123456789.com.vtenh.app.store",
        "paths": ["*"]
      }
    ]
  }
}
```

appID: `Q123456789.com.vtenh.app.store`<br>
appID: `TEAM_ID.BUNDLE_ID`

To get the team ID, you will need to have a Apple Developer License account, [https://developer.apple.com/account/#!/membership](https://developer.apple.com/account/#!/membership)

To enter your application from website:
```html
<!-- Universal Links -->
<a href="https://juniorise.com"> Open Application </a>
```

Or via terminal:
```
xcrun simctl openurl booted "https://juniorise.com/portfolios?keywords=123"
```
Read more: <a class="primary-button" href="https://medium.com/wolox/ios-deep-linking-url-scheme-vs-universal-links-50abd3802f97">URL Scheme vs Universal Links</a>

<!-- 
## Step 2: Setup on IOS
## Step 3: Hosting Verification File
## Step 4: ​Handling the incoming link in the app
-->