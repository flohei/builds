# builds


Builds is a simple PHP script that stores build numbers for all your apps in a plain text file on your server. Integrated in Xcode's build phases, it makes it easy to consistently update the build number when working with a team.

Just pass a your app's name or bundle identifier (or any other unique string) to the script and it will add your new app or simply update your available app's build number.

## Installation


The installation requires you to perform three easy steps:

1. Upload *builds.php* and *builds.txt* to your web server. Initialize *builds.txt* with your apps, if you want.
2. Add *builds.sh* to your app's project directory and configure your server path and your app's info.plist file in there.
3. Add a new Run Script build phase to your project and make it trigger your script. Don't forget to pass your unique string to identify your app. This could look like this: ``./Scripts/builds.sh com.yourcompany.awesomeapp``.

That's it. Whenever someone on your team hits build now the project should update the build number to the lastest + 1.

When you're offline it sets an empty string for your build number. Room for improvement!


## Contact

Florian Heiber  
flo@flohei.de  
http://blog.flohei.de