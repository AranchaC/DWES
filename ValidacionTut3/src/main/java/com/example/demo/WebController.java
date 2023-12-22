package com.example.demo;

import jakarta.validation.Valid;

import org.springframework.stereotype.Controller;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.servlet.config.annotation.ViewControllerRegistry;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurer;


@Controller
public class WebController implements WebMvcConfigurer {

	@Override
	public void addViewControllers(ViewControllerRegistry registry) {
		registry.addViewController("/resultados").setViewName("resultados");
	}

	@GetMapping("/")
	public String mostrarForm(PersonaForm personaForm) {
		return "formulario";
	}

	@PostMapping("/")
	public String checkPersonaInfo(@Valid PersonaForm personaForm, BindingResult bindingResult) {

		if (bindingResult.hasErrors()) {
			return "formulario";
		}

		return "redirect:/resultados";
	}
}