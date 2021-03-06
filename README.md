# magento2-pestle-platonic-module-output

This repository is a companion to the [astorm/pestle](https://github.com/astorm/pestle) repository.  This repository contains

- [A bash script](https://github.com/astorm/magento2-pestle-platonic-module-output/blob/master/module.bash) that uses the `pestle.phar` program to generate a "full" Magento module

- An example of [a simple module generated by pestle](https://github.com/astorm/magento2-pestle-platonic-module-output/tree/master/app/code/Pulsestorm/Pestleform) 

Pestle's UI Component generation is still in its early stages.  While the it generates works, a lot of it was built by "cargo cult-ing" (copying without understanding) code from Magento 2 core modules.  Despite their importances, the code consistency of Magento 2's core CRUD modules (as of 2.1) is less than great, and the quality of the code generated by pestle is less great than that.  

This module is a place for the community to suggest and contribute edits that will move the `Pulsestorm_Pestleform` module towards a community driven, platonic ideal of what a Magento 2 module should look like.  As changes are made here, we'll update [pestle's UI Component generating routines](https://github.com/astorm/pestle) to generate better module code. 

Installing the Sample Module
--------------------------------------------------
If you want to install the sample module from this repository into your Magento system, just add the following section to your Magento system's `composer.json`

    {
        /* ... */
        "require": {
            /* ... */,
            "pulsestorm/pulsestorm-pestleform":"1.0.0"
        },

        "repositories": [
            /* ... */,
            {
                "type": "vcs",
                "url": "https://github.com/astorm/magento2-pestle-platonic-module-output"
            }
    }

What you're doing above is adding this GitHub repository as a Composer VCS repository.  This tells composer to look for packages here as well as packagist (and any other repository configured in `repositories`).  Once you've done that, you can add `"pulsestorm/pulsestorm-pestleform":"1.0.0"` to your require list and Magento will find and install the package to `vendor`.  

The `autoload` section of this project's `composer.json` (not your `composer.json`) ensures Magento loads the `registration.php` file, and that PSR-4 autoloading is setup correctly.  

Generating the Sample Module
--------------------------------------------------
If you want to use pestle to generate this sample module, just [download pestle](https://github.com/astorm/pestle), copy [`module.bash`](https://github.com/astorm/magento2-pestle-platonic-module-output/blob/master/module.bash) to the root of your Magento system, and then run `module.bash`.  This bash script will run the nine pestle commands needed for a "full" module, and then run the `bin/magento module:enable` and `bin/magento setup:module` commands that let Magento know about the new module.  You may need to mark `module.bash` as executable before running it.

    //set the executable bit
    $ chmod +x module.bash
    
    //run the command
    $ ./module.bash
    
    //run the command if you can't set the executable bit
    $ bash module.bash