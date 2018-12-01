# Simple Website
This project's goal is to create an easy in implementation and simple micro-framework with blade theme support and text files based content management. 
## Warning
The project is in it's very first stages, please report all problems you encounter.
# Dependencies
- [eftec/bladeone](https://github.com/EFTEC/BladeOne)
- [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv)
- [oomphinc/composer-installers-extender](https://github.com/oomphinc/composer-installers-extender)


# Installation
1. `composer create-project szyminson/simple-website projectName`,
2. Rename `.env.example` to `.env` and change `BASE_DIR` variable to your projects path,
3. Open your project in a browser and you should see an example page.

# Subpages
Subpage list is stored in `/public/content/pages.config.txt` by default (you can change it's path in `.env` file). Remember to place subpages in the config file in order you want to see them in menu. First subpage from the file is automatically treated as a home page.


# Layout
Simple Website uses BladeOne templating engine. There are 3 types of templates:
- Main Layout - a main part of your website's look, it's used by sublayouts,
- Sublayout - this is a layout that is used by subpages, it extends main layouts,
- Module's layout - each module has it's own layout so you can easily change a look of the module.

Main and sub layouts are stored in `/views/layouts`. Modules' layouts are stored in `/views/modules`.
## File naming
- Main and sub layouts: `/views/layouts/LayoutName.blade.php`
- Modules' layouts: `/views/modules/ModuleName.blade.php`

#### Note:
You can use [Asset Packagist](https://asset-packagist.org/) for your front-end dependencies. By default front-end assets will be stored in `/public/assets`.

# Modules
Modules are simple parts which can be used to build your subpage. You can create 2 kinds of modules:
## Static Modules
Just simple modules containting only html code. You can create them by creating a blade template in `/views/modules`.
### File naming
`/views/modules/ModuleName.blade.php`
## Dynamic Modules 
In dynamic modules you can use your own php code. For this purpose you have to create a php file in `/modules` as well as a blade template in `/views/modules`. You can pass data from the backend part of your module to the template by setting a `$Content` array.
### File naming
- Backend: `/modules/ModuleName.php`
- Frontend: `/views/modules/ModuleName.blade.php`
### Example
#### ExampleModule.php
```php
$VariableName = "Your data";
$VariableName2 = "Some other data";
$VariableName3 = array("one", "two", "three");
$Content = array("Example" => $VariableName, "Example2" => $VariableName2, "Items" => $VariableName3);
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
## Components
Components are modules that you want to place in your main or sub layout (for example Menu). To use a module as a component you have to put it's name into a components' config file (by default `/public/content/components.config.txt`). Then you can simply load the component into your layout file by using it's name: ` {{ $Menu }} `. 





