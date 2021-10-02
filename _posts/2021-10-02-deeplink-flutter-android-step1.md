---
layout: post
title: "Flutter Deeplink Step1: Android"
date: 2021-10-02
categories: blogs
author: Thea Choem
comments: true
cover: https://user-images.githubusercontent.com/29684683/135708693-75db1ce7-9691-4e6c-99e1-c579d2a812f4.jpeg
permalink: /blogs/deeplink-flutter-android-step1/
---
{% include dot.md %}
Deep links are a type of link that sends users directly to an app instead of a website or a store. They are used to send users straight to specific in-app locations, saving users the time and energy locating a particular page themselves – significantly improving the user experience.

There are 2 types of Android Deeplink: _Deep Links_ & ​​_App Links_.<br>
**Deep Links** can have any custom scheme and do not require a host, nor a hosted file while **App Links** only work with HTTPS scheme and require a specified host, plus a hosted file - `assetlinks.json`

For example, if the custom scheme is _juniorise_ & host url is _juniorise.com_:
```html
<!-- Deep Links -->
<a href="juniorise://juniorise.com"> Open Application </a>

<!-- App Links -->
<a href="https://juniorise.com"> Open Application </a>
```

In this step, we will set up both of them, but before that, let's declare some resources in `strings.xml` & set up the launch mode first.

## 1. Setup launchMode & Adding resources
In `android/app/src/main/res/values/strings.xml`, add the following resources with your own value, 

> NOTE: you should have both w3 host & host since the user may type the URL with or without `www`

```xml
<?xml version="1.0" encoding="utf-8"?>
<resources>
    ...
    <string name="w3_host">www.juniorise.com</string>
    <string name="host">juniorise.com</string>
    <string name="scheme">juniorise</string>
    ...
</resources>
```

In `AndroidManifest.xml`, make sure to set `android:launchMode="singleInstance"`
```xml
<manifest xmlns:android="http://schemas.android.com/apk/res/android" package="com.vtenh.app.store">
  <application
    <activity
        android:launchMode="singleInstance"
        ...
        >
    </activity>
  </application>
</manifest>
```
<a class="primary-button mb" href="https://medium.com/android-news/android-activity-launch-mode-e0df1aa72242">Read more: Android launchMode</a>

## 2. Set intent filter

#### a. Set intent filter for Type 1: Deep Links
For this type **Deep Links**, since we don't need a host file, we just add a scheme. In `AndroidManifest.xml`, add following intent filter;
```xml
<manifest xmlns:android="http://schemas.android.com/apk/res/android" package="com.vtenh.app.store">
  <application
    ...
    <activity>
        ...
        <!-- Add this intent-filter for Deep Links -->
        <intent-filter>
          <action android:name="android.intent.action.VIEW" />
          <category android:name="android.intent.category.DEFAULT" />
          <category android:name="android.intent.category.BROWSABLE" />
          <data
            android:scheme="@string/scheme"
            android:host="@string/w3_host" />
          <data
            android:scheme="@string/scheme"
            android:host="@string/host" />
        </intent-filter>
    ...
  </application>
</manifest>
```

#### b. Set intent filter for Type 2: App Links
To implement this type **App Links**, we need to host the verification file `{HOST}/.well-known/assetlinks.json` to the website first. We will talk about how to host it in [next step](#3-host-the-verification-file-android), now let's add its intent filter in `AndroidManifest.xml`:

```xml
<manifest xmlns:android="http://schemas.android.com/apk/res/android" package="com.vtenh.app.store">
  <application
    ...
    <activity>
        ...
        <!-- Deep Links -->
        <intent-filter>
          ....
        </intent-filter>
        
        <!-- Add this intent-filter for App Links: https only -->
        <intent-filter android:autoVerify="true">
          <action android:name="android.intent.action.VIEW" />
          <category android:name="android.intent.category.DEFAULT" />
          <category android:name="android.intent.category.BROWSABLE" />
          <data
            android:scheme="https"
            android:host="@string/w3_host" />
          <data
            android:scheme="https"
            android:host="@string/host" />
        </intent-filter>
    ...
  </application>
</manifest>
```

## 3. Host the Verification file Android
Firstly, create a file called `assetlinks.json` and replace **package_name**, **sha256_cert_fingerprints** with your own.
```
[
  {
    "relation": [
      "delegate_permission/common.handle_all_urls"
    ],
    "target": {
      "namespace": "android_app",
      "package_name": "com.juniorise.app",
      "sha256_cert_fingerprints": [
        "EF:DC:ED:CA:B1:2D:16:2C:FC:30:87:D8:3E:1B:27:87:C5:2E:11:72:89:EA:24:D1:CE:5A:7D:8D:3D:3B:05:83",
        "9C:CC:C4:62:BC:0A:EB:74:AE:6D:03:38:48:FB:C0:A1:A0:11:6D:51:4A:BE:AD:39:97:0F:D3:BF:B0:6C:89:4E"
      ]
    }
  }
]
```
You can get the sha256_cert_fingerprints with the following command:
```bash
cd android
./gradlew signingReport
```
> NOTE: **sha256_cert_fingerprints** is an array, so you can also add `SHA256` from Firebase or Google Play Console.

<!-- 
## Step 2: Setup on IOS
## Step 3: Hosting Verification File
## Step 4: ​Handling the incoming link in the app
-->