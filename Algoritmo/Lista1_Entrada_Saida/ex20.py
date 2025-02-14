import math
n = float(input('Digite um número qualquer com casas decimais: '))
print(f'A parte inteira do número é {math.trunc(n)} \nA parte fracionária do número é {n-int(n):.2f} \nE o arredondamento será {round(n)}')
#para fazer a parte inteira da para usar a função math.trun ou int, e para arredondar da para usar o round, o ceil que vai arredondar para cima e o floor que vai arredondar para baixo 
