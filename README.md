# Drupal

Drupal is a free and open-source web content management system written in PHP and distributed under the GNU General Public License.

## Table of Contents

- [Introduction](#introduction)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Usage](#usage)
- [Overview](#overview)


## Introduction

This repository contains a custom Drupal module that adds a configurable block to a Drupal website. The module allows administrators to configure the content displayed within the block through the Drupal administrative interface and includes CSS styling for enhanced visual presentation.

## Getting Started

### Prerequisites

- docker-compose
- php-8
- Apache HTTP server
- composer

### Installation

1. Clone the repository into /var/www/html/ (for linux users) :

   ```bash
   git clone https://github.com/ishakzail/myCustomModule
   ```
2. Navigate to the repository and change permission (this action is for tests only) 
   ```bash
   chmod -R 777 myCustomModule
   ```
2. Install the dependencies

    ```bash
    cd myCustomModule/app
    composer install
    ```

3. Navigate to the root directory , then run:  
    ```bash
    cd myCustomModule
    docker-compose up --build
    ```
## Usage

1. Navigate to the browser and type: 

    ```bash
    localhost/myCustomModule/app/web/
    ```
2. Admin Credentials:
  - **username** : ishak
  - **password** : 1234

## Overview
