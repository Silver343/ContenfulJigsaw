# Jigsaw Blog Starter Template with Cotentful intergration

This repository is a copy of the Jigsaw blog starter kit with example intergration with Contenful [https://www.contentful.com]

This is based on the work of [matt stauffer receipe repository](https://github.com/mattstauffer/recipes.mattstauffer.com) as seen in the [live stream](https://www.youtube.com/watch?v=iQe8ZU7QfsE&t=2489s) with the episode [notes](https://www.notion.so/Episode-Notes-8871e92fc777443696891d1202362339).

The Main intergration can be seen in src/Contentful/ContenfulCollection

Some things to note in this file:

The content types match content models.
Any fields which are optional must be accessed using the null safe operator `?->`
I am collecting the content ID in the getAuthors() method, this is passed to getAuthorsPosts to filter the posts.

This is not a feature equivalent to the original blog template.
