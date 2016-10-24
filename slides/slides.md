# Drupal and Microservices

## TL;DR

* What are Microservices?
* Where does Drupal 8 fit in with a Microservice architecture?
* Demo

## Me

* Sys Ops Lead - PreviousNext
* Former member of the DrupalCI Initiative
* Maintainer of tour.module in Drupal 8

## Rant

Plenty of frontend focused examples, not enough backend examples

## What are Microservices?

_The term "Microservice Architecture" has sprung up over the last few years to describe a particular way of designing software applications as suites of independently deployable services. While there is no precise definition of this architectural style, there are certain common characteristics around organization around business capability, automated deployment, intelligence in the endpoints, and decentralized control of languages and data._ - Martin Fowler

## Goals of a Microservice

* **Business Capability** - Designed for the domain of the business
* **Intelligence in the Endpoints** - Well designed API
* **Decentralized Control of Languages and data** - I can write Golang for this presentation

## What are Microservices? (Nick edition)

Do one thing and do it well

## The Unix Philosiphy

- Write programs that do one thing and do it well.
- Write programs to work together.
- Write programs to handle text streams, because that is a universal interface.

https://en.wikipedia.org/wiki/Unix_philosophy

## The Unix Philosiphy (Cont.)

in 1986 an interviewer asked Donald Knuth to write a program that takes a text and a number N in input, and lists the N most used words sorted by their frequencies. Knuth produced a 10-pages Pascal program, to which Douglas McIlroy replied with the following 6-lines shell script

```bash
tr -cs A-Za-z '\n' |
tr A-Z a-z |
sort |
uniq -c |
sort -rn |
sed ${1}q
```

## Drupal is a Monolith

![Current](current.png)

## Where do we fit?

![Microservices](microservices.png)

## We fit here

![Microservices](microservices_drupal.png)

## Why?

**Pros**

- Content editor experiece
- Extend backends for best practices
  - Logging
  - Authentication
  - Mail
  - Search

**Cons**

- Drupal is a large code base

## How?

Remote entities to the rescue!

## Demo

![Microservices](demo.png)

## Thankyou

**Url**: https://github.com/nickschuch/ds2016

**Twitter**: @iamschuch