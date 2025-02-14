import math
print('-' * 5, 'CALCULADORA', '-' * 5)
n = float(input('Digite um número: '))
nQuad = math.pow(n, 2)
nCub = math.pow(n, 3)
raizQuad = math.sqrt(n)
raizCub = n **0.0333
print("O quadrado de {} é {} \nO cubo de {} é {} \nA raiz quadrade de {} é {:.2f} \nE a raiz cúbica de {} é {:.2f}".format(n, nQuad, n, nCub, n, raizQuad, n, raizCub))
