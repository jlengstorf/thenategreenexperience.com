import React from 'react';
import { graphql, Link } from 'gatsby';
import Layout from '../components/layout';

export const query = graphql`
  query {
    wordpress {
      posts(first: 10000) {
        nodes {
          id
          title
          excerpt
          uri
        }
      }
    }
  }
`;

const Blog = ({ data }) => {
  const posts = data.wordpress.posts.nodes;

  return (
    <Layout newsletter={false}>
      {posts.map((post) => (
        <div key={post.id}>
          <h2 dangerouslySetInnerHTML={{ __html: post.title }} />
          <div dangerouslySetInnerHTML={{ __html: post.excerpt }} />
          <Link to={post.uri}>read this post &raquo;</Link>
        </div>
      ))}
    </Layout>
  );
};

export default Blog;
