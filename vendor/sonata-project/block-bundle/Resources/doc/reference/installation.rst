.. index::
    single: Installation
    single: Configuration

Installation
============

The easiest way to install ``SonataBlockBundle`` is to require it with Composer:

.. code-block:: bash

    php composer.phar require sonata-project/block-bundle

Alternatively, you could add a dependency into your `composer.json` file:

.. code-block:: json

    {
        ...

        "require": {
            ...
            "sonata-project/block-bundle": "~2.2"
        }
    }

Now, add the bundle to the kernel:

.. code-block:: php

    <?php

    // app/AppKernel.php

    public function registerbundles()
    {
        return array(
            // Dependency (check that you don't already have this line)
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            // Vendor specifics bundles
            new Sonata\CoreBundle\SonataCoreBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),
        );
    }

Some features provided by this bundle require the ``SonataAdminBundle``.
Please add an explicit required dependency to your project's `composer.json` to
the ``SonataAdminBundle`` with the version listed in the suggestions of this Bundle.

Configuration
-------------

To use the ``BlockBundle``, add the following lines to your application configuration file:

.. code-block:: yaml

    # app/config/config.yml

    sonata_block:
        default_contexts: [sonata_page_bundle]
        blocks:
            sonata.admin.block.admin_list:
                contexts:   [admin]

            #sonata.admin_doctrine_orm.block.audit:
            #    contexts:   [admin]

            sonata.block.service.text:
            sonata.block.service.rss:

            # Some specific block from the SonataMediaBundle
            #sonata.media.block.media:
            #sonata.media.block.gallery:
            #sonata.media.block.feature_media:
