import React from 'react';
import { graphql } from 'gatsby';
import Layout from '../components/layout';

export const query = graphql`
  query($id: ID!) {
    wordpress {
      page(id: $id) {
        title
        content
      }
    }
  }
`;

const PageTemplate = ({ data }) => {
  const page = data.wordpress.page;

  return (
    <Layout>
      <div dangerouslySetInnerHTML={{ __html: page.content }} />
    </Layout>
  );
};

export default PageTemplate;
