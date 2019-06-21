# Drupal 8 Webmaster alert module
This module can be used as an helper module.

## Background 
Sending a simple notification on certain events requires sometime a bit too much code. Install this helper module and you've saved yourself some time again!
## Usage 
1. Specify an e-mail address at */admin/config/webmaster/alert*. This setting is configuration, so it will export into your existing configuration after running `drush cex`
2. From now on, in your custom modules you can use `webmaster_alert_send_alert($title, $message)`. This will send an e-mail to the configured email address with the specified message.
## Tutorial
For a tutorial on the usage of this module: [Send email notifications to webmaster on certain events in drupal 8](https://stefvanlooveren.me/blog/send-email-notifications-webmaster-certain-events-drupal-8).