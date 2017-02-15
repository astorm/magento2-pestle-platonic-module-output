# magento2-pestle-platonic-module-output

This repository is a companion to the [astorm/pestle](https://github.com/astorm/pestle) repository.  This repository contains

- [A bash script](https://github.com/astorm/magento2-pestle-platonic-module-output/blob/master/module.bash) that uses the `pestle.phar` program to generate a "full" Magento module

- An example of [a simple module generated by pestle](https://github.com/astorm/magento2-pestle-platonic-module-output/tree/master/app/code/Pulsestorm/Pestleform) 

Pestle's UI Component generation is still in its early stages.  While the it generates works, a lot of it was built by "cargo cult-ing" (copying without understanding) code from Magento 2 core modules.  Despite their importances, the code consistency of Magento 2's core CRUD modules (as of 2.1) is less than great, and the quality of the code generated by pestle is less great than that.  

This module is a place for the community to suggest and contribute edits that will move the `Pulsestorm_Pestleform` module towards a community driven, platonic ideal of what a Magento 2 module should look like.  As changes are made here, we'll update [pestle's UI Component generating routines](https://github.com/astorm/pestle) to generate better module code. 