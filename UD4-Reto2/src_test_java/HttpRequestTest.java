package com.example.demo;

import static org.assertj.core.api.Assertions.assertThat;

import org.junit.jupiter.api.DisplayName;
import org.junit.jupiter.api.Nested;
import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.boot.test.context.SpringBootTest.WebEnvironment;
import org.springframework.boot.test.web.client.TestRestTemplate;
import org.springframework.boot.test.web.server.LocalServerPort;
import org.springframework.http.HttpEntity;
import org.springframework.http.HttpHeaders;
import org.springframework.http.MediaType;

@Nested
@SpringBootTest(webEnvironment = WebEnvironment.RANDOM_PORT)
class HttpRequestTest {

	@LocalServerPort
	private int port;

	@Autowired
	private TestRestTemplate restTemplate;

//	@Test
//	void greetingShouldReturnDefaultMessage() throws Exception {
//		assertThat(this.restTemplate.getForObject("http://localhost:" + port + "/",
//				String.class)).contains("Hello, World");
//	}
	
	@Test
	@DisplayName("test1")
	void pruebaHola() throws Exception {
	    assertThat(this.restTemplate.getForObject("http://localhost:" + port + "/Hola",
	            String.class)).contains("Hola por GET: No me has pasado tu nombre");
	}
	
	@Test
	@DisplayName("Prueba HTTP POST sin param")
	void saludoPostShouldReturnDefaultMessage() throws Exception {
		assertThat(this.restTemplate.postForObject("http://localhost:" + port + "/Hola",
				null,String.class)).contains("Hola por POST. No me has pasado tu nombre");
	}
	
	@Test
	@DisplayName("Prueba HTTP POST con param")
	void saludoPost2ShouldReturnDefaultMessage() throws Exception {
		HttpHeaders headers = new HttpHeaders();
		headers.setContentType(MediaType.APPLICATION_FORM_URLENCODED);
		HttpEntity<String> request = new HttpEntity<String>("nombre=Pepe",headers);
		assertThat(this.restTemplate.postForObject("http://localhost:" + port + "/Hola",
				request,String.class)).contains("Hola por POST. Bienvenido/a: Pepe");

	}
	
}
