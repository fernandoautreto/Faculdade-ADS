peso = float(input('Digite o seu peso: '))
altura = float(input('Digite a sua altura (em cm): '))
IMC = peso / (pow((altura / 100), 2))
if IMC < 18.5:
    print(f'Você tem um IMC de {IMC:.2f}, e assim, esta abaixo do peso')
elif 18.8 <= IMC <=25:
    print(f'Você tem um IMC de {IMC:.2f}, e assim, esta no peso ideal')
elif 25.1 <= IMC <= 30:
    print(f'Você tem um IMC de {IMC:.2f}, e assim, esta acima do peso')
else:
    print(f'Você tem um IMC de {IMC:.2f}, e assim, esta obeso')