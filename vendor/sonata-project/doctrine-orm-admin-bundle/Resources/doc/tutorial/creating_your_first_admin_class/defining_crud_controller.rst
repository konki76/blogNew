.. index::
    double: Tutorial; Controller
    single: CRUD

Defining the CRUD controller
============================

A `CRUD controller` class is just an empty class with no methods. However, you can add new actions or overwrite the default CRUD actions to suit your application.

.. note::

    The controller declaration is optional, if none is defined, then the ``AdminBundle`` will use the ``CRUDController``.

Just create 3 files inside the Controller directory:

CommentAdminController
~~~~~~~~~~~~~~~~~~~~~~

.. code-block:: php

    <?php

    // src/Tutorial/BlogBundle/Controller/CommentAdminController.php

    namespace Tutorial\BlogBundle\Controller;

    use Sonata\AdminBundle\Controller\CRUDController as Controller;
    
    class CommentAdminController extends Controller
    {

    }

PostAdminController
~~~~~~~~~~~~~~~~~~~

.. code-block:: php

    <?php

    // src/Tutorial/BlogBundle/Controller/PostAdminController.php

    namespace Tutorial\BlogBundle\Controller;

    use Sonata\AdminBundle\Controller\CRUDController as Controller;

    class PostAdminController extends Controller
    {

    }

TagAdminController
~~~~~~~~~~~~~~~~~~

.. code-block:: php

    <?php

    // src/Tutorial/BlogBundle/Controller/TagAdminController.php

    namespace Tutorial\BlogBundle\Controller;

    use Sonata\AdminBundle\Controller\CRUDController as Controller;

    class TagAdminController extends Controller
    {

    }

When the controller class is instantiated, the admin class is attached to the controller.

Now, let's create the admin classes.
