package com.example.demo;

import org.springframework.stereotype.Service;

@Service
public class HolaMundoService {
	public String saludo() {
		return "Hola, Mundo";
	}
}