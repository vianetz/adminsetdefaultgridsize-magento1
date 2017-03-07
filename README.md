Vianetz AdminSetDefaultGridSize Extension
==========================================

Facts
-----
- version: 1.0.0
- extension key: Vianetz_AdminSetDefaultGridSize

Description
-----------
This module saves the chosen Magento admin grid size for each grid individually so that it is available even after 
logout and login again.

Requirements
------------
- PHP >= 5.3.6
- Mage_Core

Compatibility
-------------
- Magento >= 1.6

Installation Instructions
-------------------------
For installation notes please see also http://www.vianetz.com/en/faq/how-to-install-the-magento-extension.html.

1. Do a backup of your Magento installation for safety reasons.
2. Disable Magento compilation feature (if activated): System->Tools->Compiler
3. Unzip the setup package and copy the contents of the src/ folder into the Magento root folder. (The folder structure
   is the same as in your Magento installation. No files will be overwritten.)
   Please assure that the files are uploaded with the same file user permissions as the Magento installation!
4. Clear the Magento cache (and related caches like APC if available)
5. Logout from the admin panel and then login again
6. Enable the Magento compilation feature (if it was activated before): System->Tools->Compiler

As an alternative you can install the module via modman.
Please find more information about that installation method at https://github.com/colinmollenhour/modman
(Thanks @colinmollenhour)

We also offer paid installation services. If you are interested please contact me at support@vianetz.com.

Frequently Asked Questions
--------------------------
Please find the Frequently Asked Questions on our website www.vianetz.com/en/faq.

Support
-------
If you have any issues or suggestions with this extension, please do not hesitate to
contact me at https://www.vianetz.com/en/contacts or support@vianetz.com.

Credits
-------
Of course this extension would not have been possible without the great Magento eco-system.
Therewith credits go to:
- [Magento / Varien](http://magento.com) for the great e-commerce system

Developer
---------
Christoph Massmann
[http://www.vianetz.com](http://www.vianetz.com)
[@vianetz](https://twitter.com/vianetz)

Licence
-------
[GNU General Public License](http://www.gnu.org/licenses)

See also LICENSE.txt file.

Copyright
---------
(c) 2008-17 vianetz

This Magento Extension uses Semantic Versioning - please find more information at http://semver.org.
