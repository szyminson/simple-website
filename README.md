# Simple Website
This project's goal is to create an easy in implementation and simple micro-framework with blade theme support and text files based content management. 
## Table of Contents <!-- omit in toc -->
- [Simple Website](#simple-website)
	- [Dependencies](#dependencies)
	- [Installation](#installation)
	- [Subpages](#subpages)
	- [Layout](#layout)
		- [File naming](#file-naming)
	- [Modules](#modules)
		- [Static Modules](#static-modules)
			- [File naming](#file-naming-1)
		- [Dynamic Modules](#dynamic-modules)
			- [Variables available in module's backend](#variables-available-in-modules-backend)
			- [File naming](#file-naming-2)
			- [ExampleModule.php](#examplemodulephp)
			- [ExampleModule.blade.php](#examplemodulebladephp)
		- [Components](#components)


## Dependencies
- [eftec/bladeone](https://github.com/EFTEC/BladeOne)
- [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv)
- [oomphinc/composer-installers-extender](https://github.com/oomphinc/composer-installers-extender)
- [erusev/parsedown](https://github.com/erusev/parsedown)


## Installation
1. `composer create-project szyminson/simple-website projectName`,
2. Rename `.env.example` to `.env` and change `BASE_DIR` variable to your projects path,
3. Open your project in a browser and you should see an example page.

## Warning  <!-- omit in toc -->
The best way to undarstand how to use Simple Website is to dig through the files while reading an instructions below.

## Subpages
Subpage list is stored in `/public/content/pages.config` by default (you can change it's path in `.env` file). Remember to place subpages in the config file in order you want to see them in menu. First subpage from the file is automatically treated as a home page.


## Layout
Simple Website uses *BladeOne* templating engine. There are **3 types** of templates:
- Main Layout - a main part of your website's look, it's extended by sublayouts,
- Sublayout - this is a layout that is used by subpages, it extends main layouts,
- Module's layout - each module has it's own layout so you can easily change a look of the module.

Main and sub layouts are stored in `/views/layouts`. Modules' layouts are stored in `/views/modules`.
### File naming
- Main and sub layouts: `/views/layouts/LayoutName.blade.php`
- Modules' layouts: `/views/modules/ModuleName.blade.php`

##### Note <!-- omit in toc -->
You can use [Asset Packagist](https://asset-packagist.org/) for your front-end dependencies. By default front-end assets will be stored in `/public/assets`.

## Modules
Modules are simple parts which can be used to build your subpage. You can create **2 kinds** of modules:
### Static Modules
Just simple modules containting only html code. You can create them by creating a blade template in `/views/modules`.
#### File naming
`/views/modules/ModuleName.blade.php`
### Dynamic Modules 
In dynamic modules you can use your **own php code**. For this purpose you have to create a php file in `/modules` as well as a blade template in `/views/modules`. You can pass data from the backend part of your module to the template by setting a `$Content` array.
#### Variables available in module's backend
- `$pageId` - it's an id of current subpage,
- `$pages` - an object containting all info about your subpages,
- `$blade` - you can optionally load some additional templates into the `$Content` array but it's not recommended,
- `$parsedown` - you can use this object to parse some markdown into html.
#### File naming
- Backend: `/modules/ModuleName.php`
- Frontend: `/views/modules/ModuleName.blade.php`
#### ExampleModule.php
```php
<?php
$VariableName = "Your data";
$VariableName2 = "Some other data";
$VariableName3 = array("one", "two", "three");
$Content = array("Example" => $VariableName, "Example2" => $VariableName2, "Items" => $VariableName3);
?>
```
#### ExampleModule.blade.php
```html
<p>
  {{ $Example }}
</p>
<p>
  {{ $Example2 }}
</p>
<ul>
  @foreach($Items as $Item)
  <li>$Item</li>
  @endforeach
</ul>
```
### Components
Components are modules which can be placed in your **main** or **sublayout** ( for example *Menu* ). To use a module as a component you have to put it's name into a components' **config file** ( by default `/public/content/components.config` ). Then you can simply load the component into your layout file by using it's name: ` {{ $Menu }} `. 





