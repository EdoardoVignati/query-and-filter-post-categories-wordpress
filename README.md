# Query and filter post categories
This Wordpress plugin allows you to show a list of posts. The posts are retrieved from a single category and then filtered based on a list of categories.

THIS PLUGIN IS JUST A DRAFT. EDIT IT BEFORE TO USE.

The result of this plugin is a Bootstrap accordion that shows the title of the extracted posts grouped by categories specified in the filters.



## How to use

- Add Bootstrap to the website using a third party plugin such as Header and Footer code.
- Clone the repository, copy the folder `query_and_filter_post_categories` into the plugin folder of Wordpress (do not edit the folder name!).
- Activate it in the plugin manager of Wordpress. 
- Insert the following shortcode

```
[query_and_filter_post_categories query='category-slug' filters="catslug1,catslug2,catslug3"]]
```

- Edit `query` with a category slug and `filters` with a list of categories separated by commas.
