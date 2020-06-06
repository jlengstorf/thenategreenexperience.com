import React from 'react';
import { useStaticQuery, graphql, Link } from 'gatsby';
import styles from '../styles/footer.module.css';

const Footer = () => {
  const result = useStaticQuery(graphql`
    query {
      wordpress {
        generalSettings {
          url
        }
        menuItems(where: { location: FOOTER }) {
          nodes {
            id
            label
            url
          }
        }
      }
    }
  `);

  const navItems = result.wordpress.menuItems?.nodes.map((item) => ({
    ...item,
    url: item.url
      .replace(result.wordpress.generalSettings.url, '')
      .replace('/home/', '/'),
  }));

  return (
    <footer className={styles.footer}>
      <nav>
        {navItems.map(({ id, label, url }) => (
          <Link to={url} key={id}>
            {label}
          </Link>
        ))}
      </nav>
    </footer>
  );
};

export default Footer;
