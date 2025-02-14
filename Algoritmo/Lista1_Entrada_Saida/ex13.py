print('-' * 5, 'CONVERSOR DE MEDIDAS', '-' * 5)
p = int(input('Digite uma medida em pés: '))
m = p / 3.281
pol = p * 12
jarda = p / 3
milha =  jarda / 1760
print('Convertendo {} pés para: \nMetros: {:.2f} m \nPolegadas: {:.2f} in \nJardas: {:.2f} yd \nMilhas: {} mi'.format(p, m, pol, jarda, milha))
