package main

import (
	"log"
	"net/http"
	"time"

	"github.com/gin-gonic/gin"
	"github.com/itsjamie/gin-cors"
	"github.com/zemirco/uid"
)

func main() {
	log.Println("Starting Blog API")

	blogs := make(map[string]Blog)

	r := gin.Default()

	// Apply the middleware to the router (works with groups too)
	r.Use(cors.Middleware(cors.Config{
		Origins:         "*",
		Methods:         "GET, PUT, POST, DELETE",
		RequestHeaders:  "Origin, Authorization, Content-Type",
		ExposedHeaders:  "",
		MaxAge:          50 * time.Second,
		Credentials:     true,
		ValidateHeaders: false,
	}))

	r.POST("/blog", func(c *gin.Context) {
		var blog Blog

		// Convert the sent data to a blog post object.
		err := c.BindJSON(&blog)
		if err != nil {
			c.String(http.StatusBadRequest, "Could not process blog post")
		}

		u := uid.New(20)

		// Add to our list of blog posts.
		blogs[u] = blog

		log.Println("Blog created:", blog.Title)
		c.String(http.StatusOK, u)
	})

	r.GET("/blog/:id", func(c *gin.Context) {
		u := c.Param("id")

		if val, ok := blogs[u]; ok {
			c.JSON(http.StatusOK, val)
			return
		}

		c.String(http.StatusNotFound, "Blog post was not found")
	})

	r.POST("/blog/:id", func(c *gin.Context) {
		var blog Blog

		// Convert the sent data to a blog post object.
		err := c.BindJSON(&blog)
		if err != nil {
			c.String(http.StatusBadRequest, "Could not process blog post")
		}

		u := c.Param("id")

		if _, ok := blogs[u]; ok {
			blogs[u] = blog
			log.Println("Blog updated:", blog.Title)
			c.String(http.StatusOK, "Blog post was updated")
			return
		}

		c.String(http.StatusNotFound, "Blog post was not found")
	})

	r.DELETE("/blog/:id", func(c *gin.Context) {
		u := c.Param("id")

		if blog, ok := blogs[u]; ok {
			delete(blogs, u)
			log.Println("Blog updated:", blog.Title)
			c.String(http.StatusOK, "Blog post was deleted")
			return
		}

		c.String(http.StatusNotFound, "Blog post was not found")
	})

	r.GET("/blogs", func(c *gin.Context) {
		c.JSON(200, blogs)
	})

	r.Run()
}
