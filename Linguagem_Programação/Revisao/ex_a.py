#a) Crie um algoritmo para informar duas notas de provas, calcular e apresentar a média do aluno e se ele foi ou não aprovado.

nota = []
nota_final = 0
for i in range(2):
    nota.append(float(input(f'Digite a {1 + i}º nota: ')))
    nota_final += nota[i]

media = nota_final / 2
    
print(media)