import math
print('-' * 5, 'CALCULADORA TRIGONOMÉTRICA', '-' * 5)
altura = float(input('Digite a altura que a posta da escada esta apoiada na parede: '))
angulo = float(input('Qual é o angulo que forma entre a escada e o chão: '))
comprimento_escada = altura / math.sin(math.radians(angulo)) #altura * math.pi/180
print('A escada tem comprimento de {:.2f} m'.format(comprimento_escada))

