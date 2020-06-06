import React from 'react';
import { Helmet } from 'react-helmet';
import { useStaticQuery, graphql } from 'gatsby';
import { useLocation } from '@reach/router';

const SEO = ({ title, date, modified, blog = false }) => {
  const data = useStaticQuery(graphql`
    query {
      wordpress {
        generalSettings {
          title
          description
        }
      }
    }
  `);

  const site = data.wordpress.generalSettings;
  const siteUrl = 'https://nategreen.org';
  const location = useLocation();
  const currentUrl = `${siteUrl}${location.pathname}`;

  return (
    <Helmet>
      <title>{title || site.title}</title>
      <meta name="description" content={site.description} />
      <script type="application/ld+json">
        {`
        {
          "@context": "https://schema.org",
          "@graph": [
            {
              "@type": "WebSite",
              "@id": "${siteUrl}/#website",
              "url": "${siteUrl}/",
              "name": "${site.title}",
              "description": "${site.description}",
              "inLanguage": "en-US"
            },
            ${
              blog
                ? `
            {
              "@type": ["Person"],
              "@id": "${siteUrl}/#natertaterhead",
              "name": "Nate Green",
              "sameAs": ["https://www.facebook.com/thenategreen"]
            },
            `
                : ''
            }
            {
              "@type": "WebPage",
              "@id": "${currentUrl}#webpage",
              "url": "${currentUrl}",
              "name": "${title || site.title}",
              "isPartOf": {
                "@id": "${siteUrl}/#website"
              },
              ${blog ? `"author":{"@id":"${siteUrl}/#natertaterhead"},` : ''}
              "datePublished": "${date}",
              "dateModified": "${modified}",
              "description": "",
              "inLanguage":"en-US",
              "potentialAction": [
                {
                  "@type": "ReadAction",
                  "target": [
                    "${currentUrl}"
                  ]
                }
              ]
            }
          ]
        }
      `}
      </script>
    </Helmet>
  );
};

export default SEO;
