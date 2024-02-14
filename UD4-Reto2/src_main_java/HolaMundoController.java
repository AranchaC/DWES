package com.example.demo;

import org.springframework.util.MultiValueMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class HolaMundoController {
	
	private final HolaMundoService service;

	public HolaMundoController(HolaMundoService service) {
		this.service = service;
	}

	@RequestMapping("/saludando")
	public @ResponseBody String saludando() {
		return service.saludo();
	}
	
	// Mismo que el ejemplo de  pero en español, recibe String por GET y devuelve String
	@GetMapping("/Hola")
	public String holaGet1(@RequestParam(value = "nombre", defaultValue = "") String nombre) {
		if (nombre==null || "".equals(nombre))
			return "Hola por GET: No me has pasado tu nombre";
		else
			return "Hola por GET Bienvendido/a: " + nombre;
	}
	
//	@GetMapping("/Hola")
//	public String holaGet1Duplicado(@RequestParam(value = "nombre", defaultValue = "") String nombre) {
//		if (nombre==null || "".equals(nombre))
//			return "Hola por GET: No me has pasado tu nombre";
//		else
//			return "Hola por GET Bienvendido/a: " + nombre;
//	}
	// No tiene sentido recibir JSON por GET, complica todo mucho y no se usa

	// Por GET recibiendo String y devolviendo JSON
	@GetMapping("/HolaJson")
	public Contacto holaGet2(@RequestParam(value = "nombre", defaultValue = "Sin nombre") String nombre,
			@RequestParam(value = "apellido", defaultValue = "Sin apellido") String apellido,
			@RequestParam(value = "edad", defaultValue = "Sin edad") int edad) {
		return new Contacto(nombre,apellido,edad);
	}
	
	// Ahora por POST, recibiendo un String con el nombre y devolviendo un String
	// RequestBody en este caso recibe todos los parámetros pasados en el cuerpo de la petición de tipo 
	//  POST con x-www-form-urlencoded
	@PostMapping("/Hola")
	public String holPost1(@RequestBody(required=false) MultiValueMap<String,String> paramMap) {
		if (paramMap==null)
			return "Hola por POST soy un fantasma.";
		else 
			return "Hola por POST. no eres Bienvenido/a: " + paramMap.getFirst("nombre");
	}

	// Por POST recibiendo Json y devolviendo String
	@PostMapping("/HolaJson")
	public String holaPost2(@RequestBody(required=false) Contacto persona) {
		if (persona == null)
			return "Hola POST JSON. No has pasado contacto";
		else 
			return "Hola POST JSON. Bienvenido/a: " + persona.getNombre() + " " + persona.getApellido();

	}

	// Por POST recibiendo JSON y devolviendo JSON
	@PostMapping("/HolaJson2")
	public Contacto holaPost3(@RequestBody(required=false) Contacto persona) {
		if (persona==null)
			return new Contacto("Sin nombre","Sin apellido", 0);
		else
			return persona;
	}

	// Por POST recibiendo Strings separados y devolviendo JSON
	@PostMapping("/HolaJson3")
	public Contacto holaPost4(@RequestBody(required = false) MultiValueMap<String,String> paramMap) {
		String nombre, apellido;
		int edad;
		if (paramMap == null) {
			nombre = "Hola";
			apellido = "Mundo";
		}
		else {
			nombre = paramMap.getFirst("nombre");
			apellido = paramMap.getFirst("apellido");
		}
		
		return new Contacto(nombre,apellido, 0);
	}

}
