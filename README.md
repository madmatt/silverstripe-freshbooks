# FreshBooks Integration for SilverStripe Framework
[![Build Status](https://api.travis-ci.org/madmatt/silverstripe-freshbooks.png)](https://travis-ci.org/madmatt/silverstripe-freshbooks)
[![Code Coverage](https://scrutinizer-ci.com/g/madmatt/silverstripe-freshbooks/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/madmatt/silverstripe-freshbooks/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/madmatt/silverstripe-freshbooks/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/madmatt/silverstripe-freshbooks/?branch=master)

# Installation
1. Add the module to your 'require' with composer:
  `composer require madmatt/silverstripe-freshbooks`

2. Add a new freshbooks.yml file to your project folder with the following content:
```yml
name: FreshBooksSiteConfig
after: #FreshBooksConfig
---
FreshBooksBaseGateway:
  - api_token: ''
  - subdomain: ''
```
`api_token` can be retrieved by logging into your FreshBooks account, clicking on 'My Account' in the top-right, and clicking 'FreshBooks API' in the second-level menu. You're looking for the 'Authentication Token' value. `subdomain` is the part of the URL that you visit to get to your FreshBooks account before the 'freshbooks.com'. For example, if you normally go to `http://joesgarage.freshbooks.com`, then your subdomain is `joesgarage`.

3. Once you've put these in place, visit /dev/build?flush=1 to update the SilverStripe manifest.