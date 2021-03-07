## Hello

Current state:
![](gitphoto/202100305-1.PNG)

- Important - created on php 8.0

- Arrange .env to your username and password
- create kik database

- Download repository and:  
  $ cd kik_back  
  $ php bin/console doctrine:migrations:migrate  
  $ symfony serve  
  $
  $ cd kik_front  
  $ cd npm run dev

- Notes:
  compositionAPI vue  
  symfony move handling of request to services
  create two store: game and info (reduce amount of getters)
