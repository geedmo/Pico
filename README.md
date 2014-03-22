Pico
====

Pico is a stupidly simple, blazing fast, flat file CMS. See http://pico.dev7studios.com for more info.

## Fork details

This fork contains a simple test and modification to Pico 0.8 to improve performance for a large number of pages.

### Reason

Pico parses via Markdown every page to deliver its content to themes and to show excerpts. 

### Fundamentals

This changes assumes that a parsed content is not required for all pages. Only for current page.

### Changes

Changes to the Pico core

- Removed `parse_content` for all pages
- `limit_words` modified to use plain markdown strings

Time testing was made simply with and addon `pico_timer` which grabs the start time at `plugins_loaded` and the end time at `after_render`  
When enabled (see return sentence in source), it replaces the current theme output with a summary of the elapsed time.  

**Note** there are more ways to make a good time testing, this is simple and only to show the overall improved performance with the changes.

Changed the **default** theme to display only page excerpt in a loop.

### Results

With the Pico core **0.8**:

- **~1500** pages took 23.518465995789 seconds

With the actual changes:

- **~1500** pages took 2.4470489025116 seconds

The difference should be enough to improve the performance of almost any Pico installation.  
The time was taken on my localhost.  

The Excerpt content didn't change.

### Test replication

To replicate the test

1. In the content folder run `clone.bat` to create the 1500 copies of index.md
2. Enable the `tale_timer` addon commenting the `return` sentences.
3. Go to your website URL. 
4. To see times for Pico 0.8, replace the `pico.php` with the source of version 0.8 and run again.



