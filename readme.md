## PHP Developer test
### Background

Demonstrate your skills using a varied range of technologies our company commonly uses.
We’ll be assessing task completeness, as well as code quality.
Send a zip of your working directory (excluding the vendor directory) when finished. Include
any instructions, or notes, or parts you wish to highlight. Feel free to demonstrate any
additional knowledge or skills you have, where applicable to the task.

### Estimated Time

3 hours

### Skills Tested
#### Primary
- PHP (Laravel)
- jQuery/Javascript
- HTML
- GIT: Commit your work to a local Git repository within your working folder as you
finish logical parts of the task. Include the .git folder with the zip file. Our company
follows a commit early/commit often mantra.

### Bonus (optional)
Bootstrap: Use bootstrap to style the frontend section.

### Tasks
#### API
Using the provided CSV data, create an API route using Laravel that allows the data to be
searched.

The data should be converted to a database table. Provide a backup of the database within
the zip, or use Laravel migrations and seeders within the project.

The API should search on:
- Name: Should also match on partial names
- Bedrooms: Exact match
- Bathrooms: Exact match
- Storeys: Exact match
- Garages: Exact match
- Price: Range (between $X and $Y)

All search parameters should be optional, we should be able to search for 2 bedroom
houses, or 4 bedroom and 2 bathroom houses, etc.

The API should return JSON.

#### Frontend (Search Form)
Create a basic search form that will query the API using AJAX and display the results it
receives in HTML.

There should be some sort of searching indicator, a spinning icon or similar.

A message should be displayed if no results were found.

