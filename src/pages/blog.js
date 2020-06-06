import React from 'react';
import { graphql, Link } from 'gatsby';
import Layout from '../components/layout';
import SEO from '../components/seo';

export const query = graphql`
  query {
    wordpress {
      posts(first: 10000) {
        nodes {
          id
          title
          excerpt
          uri
          modified
        }
      }
    }
  }
`;

const Blog = ({ data }) => {
  const posts = data.wordpress.posts.nodes;

  return (
    <>
      <SEO
        title="Writing by Nate Green"
        date="2008-04-03T21:14:34"
        modified={posts[0].modified}
      />
      <Layout newsletter={false}>
        {posts.map((post) => (
          <div key={post.id}>
            <h2>
              <Link
                to={post.uri}
                style={{ color: 'inherit', textDecoration: 'none' }}
                dangerouslySetInnerHTML={{ __html: post.title }}
              />
            </h2>
            <div dangerouslySetInnerHTML={{ __html: post.excerpt }} />
            <Link to={post.uri}>read this post &raquo;</Link>
          </div>
        ))}
      </Layout>
    </>
  );
};

export default Blog;
