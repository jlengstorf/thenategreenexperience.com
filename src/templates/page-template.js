import React from 'react';
import { graphql } from 'gatsby';
import Layout from '../components/layout';
import SEO from '../components/seo';

export const query = graphql`
  query($id: ID!) {
    wordpress {
      page(id: $id) {
        title
        content
        date
        modified
      }
    }
  }
`;

const PageTemplate = ({ data }) => {
  const page = data.wordpress.page;

  return (
    <Layout>
      <SEO title={page.title} date={page.date} modified={page.modified} />
      <div dangerouslySetInnerHTML={{ __html: page.content }} />
    </Layout>
  );
};

export default PageTemplate;
