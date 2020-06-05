import React from 'react';
import { Helmet } from 'react-helmet';
import { useStaticQuery, graphql } from 'gatsby';
import Header from './header';
import OptIn from './opt-in';
import Footer from './footer';
import styles from '../styles/layout.module.css';

import '../styles/global.css';

const Layout = ({ children, newsletter = true }) => {
  const data = useStaticQuery(graphql`
    query {
      wordpress {
        generalSettings {
          title
        }
      }
    }
  `);

  const { title } = data.wordpress.generalSettings;

  return (
    <>
      <Helmet titleTemplate={`%s · ${title}`} defaultTitle={title}>
        <html lang="en" />
        <meta charSet="utf-8" />
        <link
          rel="preconnect"
          href="https://fonts.googleapis.com"
          crossorigin
        />
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
      {newsletter && <OptIn />}
      <Footer />
    </>
  );
};

export default Layout;
