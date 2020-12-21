# PaddlePress Sample Plugin
This is an example plugin for implementing software licensing for WordPress plugins.


## Local Development Tips
* Rename namespace for updater class, or change the class name.
* Make sure HTTP requests are not blocked to API
* Allow local development domains (`localhost`, `*.test`, `*.local`) for licensing
* Use correct `download_tag` for proper download. Licensing API checks permission for each download item.
