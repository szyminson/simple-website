# Simple Website
This project's goal is to create an easy in implementation and simple micro-framework with blade theme support and text files based content management. 
### Warning
The project is in very first stages, please report all problems you encounter.
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

