import React from 'react';
import { useStaticQuery, graphql } from 'gatsby';
import styles from '../styles/opt-in.module.css';

/* this rule is throwing false positives for some reason */
/* eslint-disable jsx-a11y/control-has-associated-label */

const OptIn = () => {
  const result = useStaticQuery(graphql`
    query {
      wordpress {
        page(id: "cGFnZTozMTQ1") {
          content
        }
      }
    }
  `);

  return (
    <aside className={styles.container}>
      <div
        dangerouslySetInnerHTML={{ __html: result.wordpress.page.content }}
      />
      <img src="/images/skull.jpg" alt="human skull illustration" />
      <form
        action="/.netlify/functions/subscribe"
        method="POST"
        className={styles.form}
      >
        <label htmlFor="fname" className={styles.label}>
          First Name
          <input id="fname" name="fname" type="text" className={styles.input} />
        </label>
        <label htmlFor="email" className={styles.label}>
          Email
          <input
            type="email"
            id="email"
            name="email"
            className={styles.input}
          />
        </label>
        <button className={styles.button}>Subscribe</button>
      </form>
      <p className={styles.privacy}>
        I will never share or sell your personal information. Your email will
        only be used to send you my newsletter, and you can subscribe with one
        click at any time.
      </p>
    </aside>
  );
};

export default OptIn;
