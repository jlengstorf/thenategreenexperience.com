import React from 'react';
import { graphql } from 'gatsby';
import { Helmet } from 'react-helmet';
import Layout from '../components/layout';

export const query = graphql`
  query($id: ID!) {
    wordpress {
      post(id: $id) {
        title
        content
      }
    }
  }
`;

const PostTemplate = ({ data }) => {
  const post = data.wordpress.post;

  return (
    <>
      <Helmet>
        <title>{post.title}</title>
      </Helmet>
      <Layout>
        <h1>{post.title}</h1>
        <div dangerouslySetInnerHTML={{ __html: post.content }} />
      </Layout>
    </>
  );
};

export default PostTemplate;
