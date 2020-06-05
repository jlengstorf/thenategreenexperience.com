import React from 'react';
import { graphql } from 'gatsby';
import Layout from '../components/layout';
import SEO from '../components/seo';

export const query = graphql`
  query($id: ID!) {
    wordpress {
      post(id: $id) {
        title
        content
        date
        modified
      }
    }
  }
`;

const PostTemplate = ({ data }) => {
  const post = data.wordpress.post;

  return (
    <>
      <SEO title={post.title} date={post.date} modified={post.modified} blog />
      <Layout>
        <h1>{post.title}</h1>
        <div dangerouslySetInnerHTML={{ __html: post.content }} />
      </Layout>
    </>
  );
};

export default PostTemplate;
