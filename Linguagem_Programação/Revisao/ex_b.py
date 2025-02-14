#b) A partir da digitação do ano de nascimento de um aluno, calcule a idade e use a expressão condicional para apresentar se o aluno é maior de idade ou menor

idade = int(input(f'Digite a idade do aluno: '))

while idade > 0:
    if idade >= 18:
        print('O aluno é maior de idade')

    elif idade > 0 and idade < 18 :
        print('O aluno é menor de idade')

    idade = int(input('Digite a idade de outro aluno. Para encerrar digite 0: '))
     
    if idade == 0:
        print('Programa encerrado')
