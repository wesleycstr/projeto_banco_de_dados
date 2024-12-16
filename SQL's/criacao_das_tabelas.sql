-- Tabela de alunos, com ID único por aluno de 0 a 150.
CREATE TABLE Aluno (
    id_aluno INT PRIMARY KEY CHECK (id_aluno BETWEEN 0 AND 150),
    nome VARCHAR(100) NOT NULL
);

-- Tabela de disciplinas, com nome único de identificação.
CREATE TABLE Disciplina (
    id_disciplina INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT
);

-- Tabela de turmas, com associação a uma disciplina e semestre específico.
CREATE TABLE Turma (
    id_turma INT AUTO_INCREMENT PRIMARY KEY,
    id_disciplina INT,
    semestre VARCHAR(6) NOT NULL, -- Formato exemplo: '2024.1' ou '2024.2'
    FOREIGN KEY (id_disciplina) REFERENCES Disciplina(id_disciplina)
);

-- Tabela de relação entre aluno e turma, para indicar em qual turma cada aluno está matriculado.
CREATE TABLE Matricula (
    id_matricula INT AUTO_INCREMENT PRIMARY KEY,
    id_aluno INT,
    id_turma INT,
    data_matricula DATE NOT NULL,
    FOREIGN KEY (id_aluno) REFERENCES Aluno(id_aluno),
    FOREIGN KEY (id_turma) REFERENCES Turma(id_turma),
    UNIQUE (id_aluno, id_turma) -- Garante que um aluno não possa se matricular duas vezes na mesma turma
);

-- Tabela de horários de aula para cada turma, definindo os dias e horários de início e término de cada aula.
CREATE TABLE HorarioAula (
    id_horario INT AUTO_INCREMENT PRIMARY KEY,
    id_turma INT,
    dia_semana ENUM('Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado') NOT NULL,
    horario_inicio TIME NOT NULL,
    horario_fim TIME NOT NULL,
    FOREIGN KEY (id_turma) REFERENCES Turma(id_turma)
);

-- Tabela para registrar a presença dos alunos, com entrada e saída para cada aula.
CREATE TABLE Presenca (
    id_presenca INT AUTO_INCREMENT PRIMARY KEY,
    id_matricula INT,
    DATA DATE NOT NULL,
    horario_entrada TIME,
    horario_saida TIME,
    FOREIGN KEY (id_matricula) REFERENCES Matricula(id_matricula),
    UNIQUE (id_matricula, DATA) -- Garante que cada aluno registre presença apenas uma vez por dia para uma turma
);
