.PHONY: all drupal auth

all: drupal auth

drupal:
	cd drupal && docker build -t ds2016/drupal:latest .

auth:
	cd drupal && docker build -t ds2016/auth:latest .
