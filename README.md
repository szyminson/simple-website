# Simple Website
This project's goal is to create an easy in implementation and simple micro-framework with blade theme support and text files based content management. 
### Warning
The project is in it's very first stages, please report all problems you encounter.
# Dependencies
- eftec/bladeone
- vlucas/phpdotenv
- oomphinc/composer-installers-extender


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

