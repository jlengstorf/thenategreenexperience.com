exports.createPages = async ({ actions, graphql }) => {
  // At the time of writing this query, this site averages 6 posts per year, so
  // this query, while technically a problem, will work until the year 2181 at
  // the current pace.
  const result = await graphql(`
    {
      wordpress {
        pages(first: 10000, where: { hasPassword: false }) {
          nodes {
            id
            uri
          }
        }
        posts(first: 10000) {
          nodes {
            id
            uri
          }
        }
      }
    }
  `);

  if (result.errors) {
    console.error(result.errors);
    return;
  }

  const pages = result.data.wordpress.pages.nodes;
  const posts = result.data.wordpress.posts.nodes;

  pages
    .filter((page) => {
      // ignore the opt-in — that’s special and we handle it differently
      return page.url !== '/opt-in/';
    })
    .forEach((page) => {
      actions.createPage({
        path: page.uri !== '/home/' ? page.uri : '/',
        component: require.resolve('./src/templates/page-template.js'),
        context: {
          id: page.id,
        },
      });
    });

  posts.forEach((post) => {
    actions.createPage({
      path: post.uri,
      component: require.resolve('./src/templates/post-template.js'),
      context: {
        id: post.id,
      },
    });
  });
};
