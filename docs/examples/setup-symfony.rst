.. include:: /_includes/all.rst

.. _example_setup_symfony:

*************
Setup Symfony
*************

This example will use ``symfony`` to install Symfony from within the PHP container.

.. seealso:: |ext_lnk_example_symfony_documentation|


**Table of Contents**

.. contents:: :local:


Overview
========

The following configuration will be used:

+--------------+--------------------------+-------------+------------+-----------------------+
| Project name | VirtualHost directory    | Database    | TLD_SUFFIX | Project URL           |
+==============+==========================+=============+============+=======================+
| my-symfony   | /shared/httpd/my-symfony | n.a.        | loc        | http://my-symfony.loc |
+--------------+--------------------------+-------------+------------+-----------------------+


Walk through
============

It will be ready in seven simple steps:

1. Enter the PHP container
2. Create a new VirtualHost directory
3. Install Symfony
4. Symlink webroot directory
5. Enable Symfony prod (``app.php``)
6. Setup DNS record
7. Visit http://my-symfony.loc in your browser


.. seealso:: :ref:`available_tools`


1. Enter the PHP container
--------------------------

.. code-block:: bash

   host> ./shell.sh

.. seealso:: :ref:`work_inside_the_php_container`


2. Create new vhost directory
-----------------------------

.. code-block:: bash

   devilbox@php-7.0.20 in /shared/httpd $ mkdir my-symfony


3. Install Symfony
------------------

.. code-block:: bash

   devilbox@php-7.0.20 in /shared/httpd $ cd my-symfony
   devilbox@php-7.0.20 in /shared/httpd/my-symfony $ symfony new symfony


4. Symlink webroot
------------------

.. code-block:: bash

   devilbox@php-7.0.20 in /shared/httpd/my-symfony $ ln -s symfony/web/ htdocs


5. Enable Symfony prod (``app.php``)
------------------------------------

.. code-block:: bash

   devilbox@php-7.0.20 in /shared/httpd/my-symfony $ cd symfony/web
   devilbox@php-7.0.20 in /shared/httpd/my-symfony/symfony/web $ ln -s app.php index.php


6. DNS record
-------------

If you do not have :ref:`setup_auto_dns` configured, you will need to add the
following line to your host operating systems ``/etc/hosts`` file
(or ``C:\Windows\System32\drivers\etc`` on Windows):

.. code-block:: bash
   :caption: /etc/hosts

   127.0.0.1 my-symfony.loc

.. seealso::

   * :ref:`howto_add_project_hosts_entry_on_mac`
   * :ref:`howto_add_project_hosts_entry_on_win`
   * :ref:`setup_auto_dns`


7. Open your browser
--------------------

Open your browser at http://my-symfony.loc
