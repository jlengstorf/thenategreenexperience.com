module.exports = {
  plugins: [
    'gatsby-plugin-react-helmet',
    {
      resolve: 'gatsby-source-graphql',
      options: {
        typeName: 'WPGraphQL',
        fieldName: 'wordpress',
        url: 'https://admin.nategreen.org/graphql',
      },
    },
  ],
};
