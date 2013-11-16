#!/bin/bash
buildNumber=$(curl -s http://yourdomain.com/builds.php?app=$1)
/usr/libexec/PlistBuddy -c "Set :CFBundleVersion $buildNumber" ./YourApp/YourApp-Info.plist
echo $buildNumber