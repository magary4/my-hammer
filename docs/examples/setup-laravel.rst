.. include:: /_includes/all.rst

.. _example_setup_laravel:

*************
Setup Laravel
*************

This example will use ``laravel`` to install Laravel from within the PHP container.

.. seealso:: |ext_lnk_example_laravel_documentation|


**Table of Contents**

.. contents:: :local:


Overview
========

The following configuration will be used:

+--------------+--------------------------+-------------+------------+-----------------------+
| Project name | VirtualHost directory    | Database    | TLD_SUFFIX | Project URL           |
+==============+==========================+=============+============+=======================+
| my-laravel   | /shared/httpd/my-laravel | n.a.        | loc        | http://my-laravel.loc |
+--------------+--------------------------+-------------+------------+-----------------------+


Walk through
============

It will be ready in six simple steps:

1. Enter the PHP container
2. Create a new VirtualHost directory
3. Install Laravel
4. Symlink webroot directory
5. Setup DNS record
6. Visit http://my-laravel.loc in your browser


.. seealso:: :ref:`available_tools`


1. Enter the PHP container
--------------------------

.. code-block:: bash

   host> ./shell.sh

.. seealso:: :ref:`work_inside_the_php_container`


2. Create new vhost directory
-----------------------------

.. code-block:: bash

   devilbox@php-7.0.20 in /shared/httpd $ mkdir my-laravel


3. Install Laravel
------------------

.. code-block:: bash

   devilbox@php-7.0.20 in /shared/httpd $ cd my-laravel
   devilbox@php-7.0.20 in /shared/httpd/my-laravel $ laravel new laravel-project


4. Symlink webroot
------------------

.. code-block:: bash

   devilbox@php-7.0.20 in /shared/httpd/my-laravel $ ln -s laravel-project/public/ htdocs


5. DNS record
-------------

If you do not have :ref:`setup_auto_dns` configured, you will need to add the
following line to your host operating systems ``/etc/hosts`` file
(or ``C:\Windows\System32\drivers\etc`` on Windows):

.. code-block:: bash
   :caption: /etc/hosts

   127.0.0.1 my-laravel.loc

.. seealso::

   * :ref:`howto_add_project_hosts_entry_on_mac`
   * :ref:`howto_add_project_hosts_entry_on_win`
   * :ref:`setup_auto_dns`


6. Open your browser
--------------------

Open your browser at http://my-laravel.loc
