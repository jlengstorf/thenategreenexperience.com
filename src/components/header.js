import React, { useEffect, useRef } from 'react';
import { useStaticQuery, graphql, Link } from 'gatsby';
import styles from '../styles/header.module.css';

const Header = () => {
  const ref = useRef();

  useEffect(() => {
    const updateProgressBar = () => {
      /*
       * Figure out how tall the content area is, then check how far the page
       * has been scrolled to show reading progress.
       *
       * To do this, we’ll Use The Platform™ to avoid React shenanigans.
       */
      const contentContainer = document.querySelector('main');
      const currentPosition = window.pageYOffset;
      const contentEndPosition =
        contentContainer.offsetTop + // content offset from top of the viewport
        contentContainer.offsetHeight - // content height
        document.documentElement.clientHeight; // viewport height
      const completed = Math.min(
        1,
        Math.max(0, currentPosition / contentEndPosition),
      );
      const percent = `${(completed * 100).toFixed(2)}%`;

      ref.current.style.setProperty('--width', percent);
    };

    window.addEventListener('scroll', updateProgressBar);

    return () => window.removeEventListener('scroll', updateProgressBar);
  }, [ref]);

  const result = useStaticQuery(graphql`
    query {
      wordpress {
        generalSettings {
          url
        }
        menuItems(where: { location: PRIMARY }) {
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
    url: item.url.replace(result.wordpress.generalSettings.url, ''),
  }));

  return (
    <header className={styles.header} ref={ref}>
      <Link to="/" rel="home">
        Nate Green
      </Link>
      <nav className={styles.nav}>
        {navItems.map(({ id, label, url }) => (
          <Link to={url} key={id}>
            {label}
          </Link>
        ))}
      </nav>
    </header>
  );
};

export default Header;
