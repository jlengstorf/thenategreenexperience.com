import React from 'react';
import { Link } from 'gatsby';
import { Helmet } from 'react-helmet';
import Header from './header';
import OptIn from './opt-in';
import styles from '../styles/layout.module.css';

import '../styles/global.css';

const Layout = ({ children }) => {
  return (
    <>
      <Helmet>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

        <link
          rel="preload"
          as="style"
          href="https://fonts.googleapis.com/css2?family=Spartan:wght@350&display=swap"
        />

        <link
          rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Spartan:wght@350&display=swap"
          media="print"
          onload="this.media='all'"
        />
      </Helmet>
      <Header />
      <main className={styles.main}>{children}</main>
      <OptIn />
      <footer>
        <nav>
          <Link to="/">Home</Link>
          <Link to="/blog/">Blog</Link>
          <Link to="/about/">About</Link>
          <Link to="/newsletter/">Newsletter</Link>
          <a href="https://twitter.com/TheNateGreen">Twitter</a>
        </nav>
      </footer>
    </>
  );
};

export default Layout;
